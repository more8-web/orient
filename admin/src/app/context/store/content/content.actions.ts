import { createAction, props } from "@ngrx/store";
import { ContentList, Content } from "../../models";


export const load = createAction("[Content] Load Content");
export const loadSuccess = createAction("[Content] Load Content Success", (contents: ContentList) => ({contents}));
export const loadFailure = createAction("[Content] Load Content Failure", props<{ error: any }>());
export const select = createAction("[Content] Select Content", props<{ id: number }>());
export const update = createAction("[Content] Update Content", (contents: Content) => ({contents}));



