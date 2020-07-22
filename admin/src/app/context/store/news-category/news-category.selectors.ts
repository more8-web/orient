import { createSelector } from "@ngrx/store";

import { newsFeatureKey } from "./news-category.state";
import { NewsCategory } from "@app/context";

const stateEntities = state => state[newsFeatureKey].entities;
const stateIds = state => state[newsFeatureKey].ids;
const stateSelected = state => state[newsFeatureKey].selected;
const stateIsLoading = state => state[newsFeatureKey].isLoading;


export const selectNewsCategoryList = createSelector(
    stateEntities,
    stateIds,
    (entities, ids): NewsCategory[] => ids.map(id => entities[id])
);

export const selectSelectedNewsCategoryId = createSelector(
    stateSelected,
    selected => selected
);

export const selectSelectedNewsCategory = createSelector(
    stateEntities,
    stateSelected,
    (entities, id) => entities[id]
);

export const selectNewsCategoriesIsLoading = createSelector(
    stateIsLoading,
    isLoading => isLoading
);
