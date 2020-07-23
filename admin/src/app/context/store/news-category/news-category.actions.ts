import { createAction, props } from "@ngrx/store";
import { NewsCategoryList, NewsCategory } from "../../models";


export const load = createAction("[News Category] Load News Category");
export const loadSuccess = createAction("[News Category] Load News Category Success", (categories: NewsCategoryList) => ({categories}));
export const loadFailure = createAction("[News Category] Load News Category Failure", props<{ error: any }>());
export const select = createAction("[News Category] Select News Category", props<{ id: number }>());
export const update = createAction("[News Category] Update News Category", (categories: NewsCategory) => ({categories}));



