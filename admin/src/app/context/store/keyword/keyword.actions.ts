import { createAction, props } from "@ngrx/store";
import { KeywordList, Keyword } from "../../models";


export const load = createAction("[Keyword] Load Keyword");
export const loadSuccess = createAction("[Keyword] Load Keyword Success", (keywords: KeywordList) => ({keywords}));
export const loadFailure = createAction("[Keyword] Load Keyword Failure", props<{ error: any }>());
export const select = createAction("[Keyword] Select Keyword", props<{ id: number }>());
export const update = createAction("[Keyword] Update Keyword", (keywords: Keyword) => ({keywords}));

