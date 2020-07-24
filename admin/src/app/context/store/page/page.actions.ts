import { createAction, props } from "@ngrx/store";
import { PageList, Page } from "../../models";


export const load = createAction("[Page] Load Page");
export const loadSuccess = createAction("[Page] Load Page Success", (pages: PageList) => ({pages}));
export const loadFailure = createAction("[Page] Load Page Failure", props<{ error: any }>());
export const select = createAction("[Page] Select Page", props<{ id: number }>());
export const update = createAction("[Page] Update Page", (page: Page) => ({page}));



