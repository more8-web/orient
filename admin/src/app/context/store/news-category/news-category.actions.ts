import { createAction, props } from "@ngrx/store";
import { NewsCategoryList } from "../../models";

class NewsCategoryActions {
    load = createAction("[News Category] Load News Category");
    loadSuccess = createAction("[News Category] Load News Category Success", (categories: NewsCategoryList) => ({categories}));
    loadFailure = createAction("[News Category] Load News Category Failure", props<{ error: any }>());
    select = createAction("[News Category] Select News Category", props<{ id: number }>());
}

export const newsCategoryActions = new NewsCategoryActions();
