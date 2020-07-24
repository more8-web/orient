import { createReducer, on } from "@ngrx/store";
import * as actions from "./page.actions";
import { initialState } from "./page.state";

export const reducer = createReducer(
    initialState,
    on(
        actions.load,
        state => ({...state, isLoading: true})
    ),
    on(
        actions.loadSuccess,
        (state, {pages}) => ({
            ...state,
            ids: Object.values(pages).map(item => item.id).sort(),
            entities: {...pages},
            isLoading: false
        })
    ),
    on(
        actions.select,
        (state, {id}) => ({...state, selected: id})
    ),
    on(
        actions.update,
        (state, {page}) => {
            if (page.id) {
                return {...state, entities: {...state.entities, [page.id]: page}};
            }
            return state;
        }
    ),
);
