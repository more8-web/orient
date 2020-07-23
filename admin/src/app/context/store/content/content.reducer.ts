import { createReducer, on } from "@ngrx/store";
import * as actions from "./content.actions";
import { initialState } from "./content.state";

export const reducer = createReducer(
    initialState,
    on(
        actions.load,
        state => ({...state, isLoading: true})
    ),
    on(
        actions.loadSuccess,
        (state, {contents}) => ({
            ...state,
            ids: Object.values(contents).map(item => item.id).sort(),
            entities: {...contents},
            isLoading: false
        })
    ),
    on(
        actions.select,
        (state, {id}) => ({...state, selected: id})
    ),
    on(
        actions.update,
        (state, {contents}) => {
            if (contents.id) {
                return {...state, entities: {...state.entities, [contents.id]: contents}};
            }
            return state;
        }
    ),
);
