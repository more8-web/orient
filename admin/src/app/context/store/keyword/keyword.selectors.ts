import { createSelector, Store } from "@ngrx/store";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";

import { newsFeatureKey } from "./keyword.state";
import { Keyword } from "@app/context";

const stateEntities = state => state[newsFeatureKey].entities;
const stateIds = state => state[newsFeatureKey].ids;
const stateSelected = state => state[newsFeatureKey].selected;
const stateIsLoading = state => state[newsFeatureKey].isLoading;


@Injectable()
export class KeywordSelectors {
    constructor(private store: Store) {
    }

    list(): Observable<Keyword[]> {
        return this.store.select(
            createSelector(
                stateEntities,
                stateIds,
                (entities, ids) => ids.map(id => entities[id])
            )
        );
    }

    selected(): Observable<Keyword> {
        return this.store.select(
            createSelector(
                stateEntities,
                stateSelected,
                (entities, id) => entities[id]
            )
        );
    }

    isLoading(): Observable<boolean> {
        return this.store.select(
            createSelector(
                stateIsLoading,
                isLoading => isLoading
            )
        );
    }
}
