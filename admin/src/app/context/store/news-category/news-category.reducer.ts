import { createReducer, on } from "@ngrx/store";
import { newsCategoryActions as actions } from "./news-category.actions";
import { initialState } from "./news-category.state";

export const reducer = createReducer(
    initialState,
    on(
        actions.load,
        state => ({...state, isLoading: true})
    ),
    on(
        actions.loadSuccess,
        (state, {categories}) => ({
            ...state,
            ids: Object.values(categories).map(item => item.id).sort(),
            entities: {...categories},
            isLoading: false
        })
    ),
    on(
        actions.select,
        (state, {id}) => ({...state, selected: id})
    ),
);
