import { createReducer, on } from "@ngrx/store";
import * as actions from "./content-category.actions";
import { initialState } from "./content-category.state";

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
    on(
        actions.update,
        (state, {categories}) => {
            if (categories.id) {
                return {...state, entities: {...state.entities, [categories.id]: categories}};
            }
            return state;
        }
    ),
);
