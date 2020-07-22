import { createSelector } from "@ngrx/store";

import { newsFeatureKey } from "./news-log.state";
import { NewsLog } from "@app/context";

const stateEntities = state => state[newsFeatureKey].entities;
const stateIds = state => state[newsFeatureKey].ids;
const stateSelected = state => state[newsFeatureKey].selected;
const stateIsLoading = state => state[newsFeatureKey].isLoading;


export const selectNewsLogList = createSelector(
    stateEntities,
    stateIds,
    (entities, ids): NewsLog[] => ids.map(id => entities[id])
);

export const selectSelectedNewsLogId = createSelector(
    stateSelected,
    selected => selected
);

export const selectSelectedNewsLog = createSelector(
    stateEntities,
    stateSelected,
    (entities, id) => entities[id]
);

export const selectNewsLogsIsLoading = createSelector(
    stateIsLoading,
    isLoading => isLoading
);
