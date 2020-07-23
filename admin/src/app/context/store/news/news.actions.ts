import { createAction, props } from "@ngrx/store";
import { News, NewsList } from "../../models";

export const load = createAction("[News] Load News");
export const loadSuccess = createAction("[News] Load News Success", (news: NewsList) => ({news}));
export const loadFailure = createAction("[News] Load News Failure", props<{ error: any }>());
export const select = createAction("[News] Select News", props<{ id: number }>());
export const update = createAction("[News] Update News", (news: News) => ({news}));

