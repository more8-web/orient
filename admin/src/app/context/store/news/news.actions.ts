import { createAction, props } from "@ngrx/store";
import { NewsList } from "../../models";

class NewsActions {
    load = createAction("[News] Load News");
    loadSuccess = createAction("[News] Load News Success", (news: NewsList) => ({news}));
    loadFailure = createAction("[News] Load News Failure", props<{ error: any }>());
    select = createAction("[News] Select News", props<{ id: number }>());
}

export const newsActions = new NewsActions();
