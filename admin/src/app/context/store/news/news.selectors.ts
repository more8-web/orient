import { createSelector } from "@ngrx/store";

import { newsFeatureKey } from "./news.state";

const stateEntities = state => state[newsFeatureKey].entities;
const stateIds = state => state[newsFeatureKey].ids;
const stateSelected = state => state[newsFeatureKey].selected;
const stateIsLoading = state => state[newsFeatureKey].isLoading;


export const selectNewsList = createSelector(
    stateEntities,
    stateIds,
    (entities, ids) => ids.map(id => entities[id])
);

export const selectSelectedNewsId = createSelector(
    stateSelected,
    selected => selected
);

export const selectSelectedNews = createSelector(
    stateEntities,
    stateSelected,
    (entities, id) => entities[id]
);

export const selectNewsIsLoading = createSelector(
    stateIsLoading,
    isLoading => isLoading
);
