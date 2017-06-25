import {AppState} from '../bootstrap';

export class CatalogAppState extends AppState {

    getState() {
        return {
            config: this.data.config,
            FilterData: this.data.FilterData,
            FilterState: this.data.FilterState,
            ClearableFilters: this.data.ClearableFilters,
            eventLabel: this.data.EventLabel,
            selectedBrands: this.data.selectedBrands || [],
            sizeGroupId: this.data.config.sizeGroupId,
            userCity: this.data.userCity,
            isCityModalOpen: false
        };
    }
}


export class ShopAppState extends AppState {

    getState() {
        return {
            config: this.data.config,
            FilterData: this.data.FilterData,
            FilterState: this.data.FilterState,
            ClearableFilters: this.data.ClearableFilters,
            eventLabel: this.data.EventLabel,
            sizeGroupId: this.data.config.sizeGroupId
        };
    }
}



// WEBPACK FOOTER //
// ./shafa/js/catalog/models.js