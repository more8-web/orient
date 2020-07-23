import { createAction, props } from "@ngrx/store";
import { ContentCategoryList, ContentCategory } from "../../models";


export const load = createAction("[Content Category] Load Content Category");
export const loadSuccess = createAction("[Content Category] Load Content Category Success",
    (categories: ContentCategoryList) => ({categories}));
export const loadFailure = createAction("[Content Category] Load Content Category Failure", props<{ error: any }>());
export const select = createAction("[Content Category] Select Content Category", props<{ id: number }>());
export const update = createAction("[Content Category] Update Content Category", (categories: ContentCategory) => ({categories}));


