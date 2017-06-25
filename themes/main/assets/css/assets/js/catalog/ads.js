export const AD_CATALOG_TOP = `
    <!-- /52555387/shafa.ua_728x90 -->
    <div>
        <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
        <script>
            var googletag = googletag || {};
            googletag.cmd = googletag.cmd || [];
        </script>
        <script>
            // GPT slots
            var gptAdSlots = [];
            googletag.cmd.push(function() {
                var _YB = _YB || {
                    ab: function() {
                        return (Math.random() >= 0.1 ? 'b' : 'a' + Math.floor(Math.random() * 10));
                    }
                };
                var _yt = new Date(),
                    yb_th = _yt.getUTCHours() - 8,
                    yb_tm = _yt.getUTCMinutes(),
                    yb_wd = _yt.getUTCDay();
                if (yb_th < 0) {
                    yb_th = 24 + yb_th;
                    yb_wd -= 1;
                };
                if (yb_wd < 0) {
                    yb_wd = 7 + yb_wd
                };
    
                // Define a size mapping object. The first parameter to addSize is
                // a viewport size, while the second is a list of allowed ad sizes.
                var mapping = googletag.sizeMapping().
    
                // tablet & mobile 300x250
                addSize([0, 0], [300, 250]).
    
                // Desktop 728x90
                addSize([768, 0], [728, 90]).build();
    
                // Define the GPT slot
                gptAdSlots[0] = googletag.defineSlot('/52555387/shafa.ua_728x90', [[300, 250],[728, 90]], 'div-gpt-ad-1494416343659-1').setTargeting('yb_ab', _YB.ab()).setTargeting('yb_ff', String(Math.round(Math.random()))).setTargeting('yb_th', yb_th.toString()).setTargeting('yb_tm', yb_tm.toString()).setTargeting('yb_wd', yb_wd.toString()).
                defineSizeMapping(mapping).
                addService(googletag.pubads());
                // Start ad fetching
                googletag.enableServices();
            });
        </script>
    </div>
    <div id='div-gpt-ad-1494416343659-1'>
        <script>
            googletag.cmd.push(function() {
                googletag.display('div-gpt-ad-1494416343659-1');
            });
        </script>
    </div>`;


export const AD_CATALOG_BOTTOM = `
    <!-- /52555387/shafa.ua_728x90_2 -->
    <div>
        <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
        <script>
            var googletag = googletag || {};
            googletag.cmd = googletag.cmd || [];
        </script>
        <script>
            // GPT slots
            var gptAdSlots = [];
            googletag.cmd.push(function() {
                var _YB = _YB || {
                    ab: function() {
                        return (Math.random() >= 0.1 ? 'b' : 'a' + Math.floor(Math.random() * 10));
                    }
                };
                var _yt = new Date(),
                    yb_th = _yt.getUTCHours() - 8,
                    yb_tm = _yt.getUTCMinutes(),
                    yb_wd = _yt.getUTCDay();
                if (yb_th < 0) {
                    yb_th = 24 + yb_th;
                    yb_wd -= 1;
                };
                if (yb_wd < 0) {
                    yb_wd = 7 + yb_wd
                };
    
                // Define a size mapping object. The first parameter to addSize is
                // a viewport size, while the second is a list of allowed ad sizes.
                var mapping = googletag.sizeMapping().
    
                // tablet & mobile 300x250
                addSize([0, 0], [300, 250]).
    
                // Desktop 728x90
                addSize([768, 0], [728, 90]).build();
    
                // Define the GPT slot
                gptAdSlots[0] = googletag.defineSlot('/52555387/shafa.ua_728x90_2', [[300, 250],[728, 90]], 'div-gpt-ad-1494416343659-2').setTargeting('yb_ab', _YB.ab()).setTargeting('yb_ff', String(Math.round(Math.random()))).setTargeting('yb_th', yb_th.toString()).setTargeting('yb_tm', yb_tm.toString()).setTargeting('yb_wd', yb_wd.toString()).
                defineSizeMapping(mapping).
                addService(googletag.pubads());
                // Start ad fetching
                googletag.enableServices();
            });
        </script>
    </div>
    <div id='div-gpt-ad-1494416343659-2'>
        <script>
            googletag.cmd.push(function() {
                googletag.display('div-gpt-ad-1494416343659-2');
            });
        </script>
    </div>`;


// WEBPACK FOOTER //
// ./shafa/js/catalog/ads.js