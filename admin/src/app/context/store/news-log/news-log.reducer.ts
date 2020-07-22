import { createReducer, on } from "@ngrx/store";
import { newsLogActions as actions } from "./news-log.actions";
import { initialState } from "./news-log.state";

export const reducer = createReducer(
    initialState,
    on(
        actions.load,
        state => ({...state, isLoading: true})
    ),
    on(
        actions.loadSuccess,
        (state, {logs}) => ({
            ...state,
            ids: Object.values(logs).map(item => item.id).sort(),
            entities: {...logs},
            isLoading: false
        })
    ),
    on(
        actions.select,
        (state, {id}) => ({...state, selected: id})
    ),
);
