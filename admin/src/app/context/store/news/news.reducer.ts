import { createReducer, on } from "@ngrx/store";
import * as actions from "./news.actions";
import { initialState } from "./news.state";

export const reducer = createReducer(
    initialState,
    on(
        actions.load,
        state => ({...state, isLoading: true})
    ),
    on(
        actions.loadSuccess,
        (state, {news}) => ({
            ...state,
            ids: Object.values(news).map(item => item.id).sort(),
            entities: {...news},
            isLoading: false
        })
    ),
    on(
        actions.select,
        (state, {id}) => {
            return ({...state, selected: id})
        }
    ),
    on(
        actions.update,
        (state, {news}) => {
            if (news.id) {
                return {...state, entities: {...state.entities, [news.id]: news}};
            }
            return state;
        }
    ),
);
