<?php 
/**
 * Copyright (c) 2010 David Soyez, http://code.google.com/p/yii-crontab/
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *  
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *  
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * 
 * Crontab helps to add system cron jobs
 *
 * @author David Soyez <david.soyez@yiiframework.fr>
 * @link http://code.google.com/p/yii-crontab/
 * @copyright Copyright &copy; 2009-2010 yiiframework.fr
 * @license http://www.opensource.org/licenses/mit-license.php
 * @version 0.3
 * @package crontab
 * @since 0.1
 */
class Crontab extends CComponent{
	
	public    $filename;
	public    $crontab;   // Путь к crontab
	public    $php;       // Путь к php
	public    $blockname; // Ограничители блока в crontab
	public    $debug;     // В режиме отладки не перезаписываем crontab
        
	protected $canSave   = true;
	protected $lines     = array();
	protected $jobs	     = array();
	protected $start     = false;
	protected $final     = false;
	
        private function def($value,$name,$default,&$opt) {
            if ($value) return $value;
            if (isset($opt[$name]) && $opt[$name]) return $opt[$name];
            return $default;
        }
        
	public function init() { // Вызывать вручную, сразу после создания
            
            //parent::init();
            $options = Yii::app()->params['crontab'];
            //Yii::log('crontab start:'.  var_export($options,true));
            
            $this->filename = $this->def($this->filename ,'filename' ,'crons'  ,$options);
            $this->crontab  = $this->def($this->crontab  ,'crontab'  ,'crontab',$options);
            $this->php      = $this->def($this->php      ,'php'      ,'php'    ,$options);
            $this->blockname= $this->def($this->blockname,'blockname',''       ,$options);
            $this->debug    = $this->def($this->debug    ,'debug'    ,false    ,$options);

            $pos = strpos($this->filename, DIRECTORY_SEPARATOR);
            if ($pos===false || $pos>0)
                $this->filename = Yii::getPathOfAlias('application.extensions.crontab.crontabs')
                    .DIRECTORY_SEPARATOR.$this->filename;
            $dir = dirname($this->filename);
            if (!@is_dir($dir))
                if (!@mkdir($dir, 0777, true)){
                    Yii::log('Не могу создать дерикторию "'.$dir.'"');
                    $this->canSave = false;
                }
            //Yii::log('crontab blockname: '.$this->blockname);
            //Yii::log('crontab filename: '.$this->filename);
            //Yii::log('crontab php: '.$this->php);
            //Yii::log('crontab crontab: '.$this->crontab);
            if ($this->blockname && $this->canSave) {
                $this->getSystemCrontab();
                $this->loadJobs();
            } else
                $this->canSave = false;
            return $this;
        }

	/**
	 *	Add a job
	 *
	 *	If any parameters are left NULL then they default to *
	 *
	 *	A hyphen (-) between integers specifies a range of integers. For
	 *	example, 1-4 means the integers 1, 2, 3, and 4.
	 *
	 *	A list of values separated by commas (,) specifies a list. For
	 *	example, 3, 4, 6, 8 indicates those four specific integers.
	 *
	 *	The forward slash (/) can be used to specify step values. The value
	 *	of an integer can be skipped within a range by following the range
	 *	with /<integer>. For example, 0-59/2 can be used to define every other
	 *	minute in the minute field. Step values can also be used with an asterisk.
	 *	For instance, the value * /3 (no space) can be used in the month field to run the
	 *	task every third month...
	 *
	 *	@param	string	$command	Command
	 *	@param	mixed	$min		Minute(s)... 0 to 59
	 *	@param	mixed	$hour		Hour(s)... 0 to 23
	 *	@param	mixed	$day		Day(s)... 1 to 31
	 *	@param	mixed	$month		Month(s)... 1 to 12 or short name
	 *	@param	mixed	$dayofweek	Day(s) of week... 0 to 7 or short name. 0 and 7 = sunday
	 *  @return CCrontab return this
	 */
	function addJob($command, $min=NULL, $hour=NULL, $day=NULL, $month=NULL, $dayofweek=NULL)
	{
		$this->jobs[] = new Cronjob($command, $min, $hour, $day, $month, $dayofweek);
		
		return $this;
		
	}

	
	/**
	 *	Add an application job
	 */
	function addApplicationJob($entryScript, $commandName, $parameters = array(), $min=NULL, $hour=NULL, $day=NULL, $month=NULL, $dayofweek=NULL)
	{
		$this->jobs[] = new CronApplicationJob($entryScript, $commandName, $parameters, $min, $hour, $day, $month, $dayofweek, $this->php);

		return $this;
	}
	
	/**
	 * Add job object
	 * @param mixed $job CronApplicationJob or Cronjob
	 * @return CCrontab
	 */
	public function add($job)
	{
		if($job instanceof CronApplicationJob OR $job instanceof Cronjob)
			$this->jobs[] = $job;
				
		return $this;
	}

	/**
	 * Get jobs
	 * @return array jobs
	 */
	public function getJobs()
	{
		return $this->jobs;
	}
	
	/**
	 * Remove a job with given offset
	 * @return CCrontab
	 */
	public function removeJob($offset = NULL)
	{
		if($offset !== NULL)
			unset($this->jobs[$offset]);
		
		return $this;
	}
	
	/**
	 * remove all jobs
	 * @return CCrontab
	 */
	public function eraseJobs()
	{
		$this->jobs = array();
		
		return $this;
	}	
	
	protected function initRange() {
            $start = '# '.$this->blockname.' start';
            $final = '# '.$this->blockname.' final';
            $this->start = false;
            for($i=0;$i<count($this->lines);$i++) {
                $row = trim($this->lines[$i]);
                if ($this->start === false) {
                    if ($row==$start) {
                        $this->start = $i;
                        $this->final = false;
                    }
                } else 
                    if ($row==$final) {
                        $this->final = $i;
                        break;
                    }
            }
            if ($this->final === false) $this->start = false;
        }
	
	protected function getSystemCrontab()
	{
            exec($this->crontab.' -l',$this->lines,$result);
            if ($result==0) {
                $this->initRange();
                $len = file_put_contents($this->filename, implode("\n",$this->lines));
                if ($len===false) {
                    $this->canSave = false;
                    Yii::log('Не удалось записать '.$this->filename);
                }
            } else {
                Yii::log('Не удалось выполнить команду '.$this->crontab.' -l');
                $this->canSave = false;
            }
        }
        
	/**
	 * Load jobs from crontab file
	 */
	protected function loadJobs()
	{
            if ($this->start!==false) {
                for($i=$this->start+1;$i<$this->final;$i++)
                    if ($line = trim(str_replace("\t", ' ', $this->lines[$i]))) {
                        $line = implode(' ',array_filter(explode(' ', $line)));
                        $job = CronApplicationJob::isApplicationJob($line,$this->php)
                             ? CronApplicationJob::parseFromCommand($line,$this->php)
                             : Cronjob::parseFromCommand($line);
                        if($job !== false)
                            $this->jobs[] = $job;
                    }
            }
	}
	
	
	
	/**
	 *	Write cron command to file. Make sure you used createCronFile
	 *	before using this function of it will return false
	 *  @return CCrontab return this or false
	 */
	function saveCronFile(){
            if (!$this->canSave) return false;
            if ($this->start===false) {
                $start = '# '.$this->blockname.' start';
                $final = '# '.$this->blockname.' final';
                $this->start = count($this->lines);
                $this->final = $this->start + 1;
                $this->lines[] = $start;
                $this->lines[] = $final;
            }
            $lines = array();
            foreach ($this->jobs as $job)
                $lines[] = $job->getJobCommand();
            array_splice(
                $this->lines, 
                $this->start + 1, 
                $this->final - $this->start - 1,
                $lines);
            $len = file_put_contents($this->filename, implode("\n",$this->lines));
            if ($len===false) {
                $this->canSave = false;
                Yii::log('Не удалось перезаписать '.$this->filename);
            }
            return $this;
	}
	
	
	/**
	 *	Save cron in system
	 *	@return boolean this if successful else false
	 */
	function saveToCrontab(){
            if (!$this->canSave) return false;
            if ($this->debug) return false;
		
            exec($this->crontab.' '.$this->filename,$report,$result);
            if($result==0)
                return $this;
            else {
                Yii::log('CRONTAB ERROR:'.var_export($report,true));
                return false;
            }
	}
	
}


class Cronjob 
{
	protected $minute		= NULL;
	protected $hour			= NULL;
	protected $day			= NULL;
	protected $month		= NULL;
	protected $dayofweek	= NULL;
	protected $command		= NULL;
	
	
	function Cronjob($command, $min=NULL, $hour=NULL, $day=NULL, $month=NULL, $dayofweek=NULL)
	{
		$this->setMinute($min);
		$this->setHour($hour);
		$this->setDay($day);
		$this->setMonth($month);
		$this->setDayofweek($dayofweek);
		$this->command = $command;	
	
		return $this;
	}
	
	/**
	 * Return the system command for the object
	 */
	public function getJobCommand()
	{
		return $this->minute." ".$this->hour." ".$this->day." ".$this->month." ".$this->dayofweek." ".$this->getCommand();
	}
	
	/**
	 * Return the command
	 */
	public function getCommand()
	{
		return $this->command;
	}	
	
	/**
	 * parse system job command and return an object
	 * Works only for regular entry
	 */
	static function parseFromCommand($command)
	{
            $vars = explode(' ', $command, 6);
            if(count($vars) < 5) return false;

            $min 	= $vars[0];
            $hour 	= $vars[1];
            $day	= $vars[2];
            $month	= $vars[3];
            $dayofweek 	= $vars[4];

            $command 	= $vars[5];

            return new Cronjob($command, $min, $hour, $day, $month, $dayofweek);
	}
	
	/* setter */
	
	public function setMinute($min)
	{
		if($min=="0")
			$this->minute=0;
		elseif($min)
			$this->minute=$min;
		else
			$this->minute="*";
	}
	
	public function setHour($hour)
	{
		if($hour=="0")
			$this->hour=0;
		elseif($hour)
			$this->hour=$hour;
		else
			$this->hour="*";	
	}
	
	public function setDay($day)
	{
		$this->day=($day) ? $day : "*";
	}
	
	public function setMonth($month)
	{
		$this->month=($month) ? $month : "*";
	}
	
	public function setdayofweek($dayofweek)
	{
		$this->dayofweek=($dayofweek) ? $dayofweek : "*";
	}
	
	/* getter */
	
	public function getMinute()
	{
		return $this->minute;
	}
	
	public function getHour()
	{
		return $this->hour;
	}

	public function getDay()
	{
		return $this->day;
	}

	public function getMonth()
	{
		return $this->month;
	}

	public function getDayofweek()
	{
		return $this->dayofweek;
	}	
	
}


class CronApplicationJob extends Cronjob
{
	protected $entryScript = NULL;
	protected $commandName = NULL;
	protected $parameters  = array();
	protected $php         = 'php';
	
	function CronApplicationJob($entryScript, $commandName, $parameters = array(), $min=NULL, $hour=NULL, $day=NULL, $month=NULL, $dayofweek=NULL, $php=NULL)
	{
		$this->entryScript = $entryScript;
		$this->commandName = $commandName;
		$this->parameters = $parameters;
                if ($php !== null)
                    $this->php = $php;
		
		$command = $this->getCommand();
			
		parent::Cronjob($command, $min, $hour, $day, $month, $dayofweek);
		
		return $this;	
	
	}
	
	/**
	 * Return the system command
	 */
	public function getJobCommand()
	{
		$command =  $this->minute." ".$this->hour." ".$this->day." ".$this->month." ".$this->dayofweek." ".$this->getCommand();

		return $command;
	}	
	
	/**
	 * Return the Application command
	 */
	public function getCommand()
	{
		$command = $this->php.' '.Yii::getPathOfAlias('webroot').'/'.$this->entryScript . '.php ' . $this->commandName;
		
		foreach($this->parameters as $parameter)
			$command .= ' ' . $parameter;	
			
		return $command;
	}
	
	/**
	 * parse system job command and return an object
	 */
	static function parseFromCommand($command,$php='php')
	{
            $vars = explode(' ', $command, 6);
            if (count($vars) < 5) return false;
			
            $min 	 = $vars[0];
            $hour 	 = $vars[1];
            $day	 = $vars[2];
            $month	 = $vars[3];
            $dayofweek 	 = $vars[4];

            $command 	 = $vars[5];
            if (substr($command, 0, strlen($php))!=$php)
                return false;

            if(preg_match('|^ ([^\\\]*.php) ([^\\\]*)|', substr($command, strlen($php)), $matches) > 0)
            {
                    $entryScript = basename($matches[1], ".php");
                    $params = explode(' ',$matches[2]);
                    $commandName = $params[0];
                    array_shift($params);
                    $parameters = $params;	
            }
            else
                    return false;

            return new CronApplicationJob($entryScript, $commandName, $parameters, $min, $hour, $day, $month, $dayofweek,$php);
	}
	
	/**
	 * Check if the given command would be an ApplicationJob
	 */
	static function isApplicationJob($line,$php='php')
	{
            $vars = explode(' ', $line, 6);
            if (count($vars) < 5) return false;
            $command = $vars[5];
            if (substr($command, 0, strlen($php))==$php)
                return (bool)preg_match("|^ ([^\\\]*.php) ([^\\\]*)|", substr($command, strlen($php)));
            else
                return false;
	}
	
	
	/* setter */
	
	public function setParams($params)
	{
		$this->parameters = $params;
	}

	public function setEntryScript($entryScript)
	{
		$this->entryScript = $entryScript;
	}	

	public function setCommandName($commandName)
	{
		$this->commandName = $commandName;
	}		
	
	
	/* getter */
	
	public function getParams()
	{
		return $this->parameters;
	}	
	
	public function getEntryScript()
	{
		return $this->entryScript;
	}

	public function getCommandName()
	{
		return $this->commandName;
	}		
	
}