import { createReducer, on } from "@ngrx/store";
import * as actions from "./keyword.actions";
import { initialState } from "./keyword.state";


export const reducer = createReducer(
    initialState,
    on(
        actions.load,
        state => ({...state, isLoading: true})
    ),
    on(
        actions.loadSuccess,
        (state, {keywords}) => ({
            ...state,
            ids: Object.values(keywords).map(item => item.id).sort(),
            entities: {...keywords},
            isLoading: false
        })
    ),
    on(
        actions.select,
        (state, {id}) => ({...state, selected: id})
    ),
    on(
        actions.update,
        (state, {keywords}) => {
            if (keywords.id) {
                return {...state, entities: {...state.entities, [keywords.id]: keywords}};
            }
            return state;
        }
    ),
);
