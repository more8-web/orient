import { createAction, props } from "@ngrx/store";
import { NewsLogList } from "../../models";

class NewsLogActions {
    load = createAction("[News Log] Load News Log");
    loadSuccess = createAction("[News Log] Load News Log Success", (logs: NewsLogList) => ({logs}));
    loadFailure = createAction("[News Log] Load News Log Failure", props<{ error: any }>());
    select = createAction("[News Log] Select News Log", props<{ id: number }>());
}

export const newsLogActions = new NewsLogActions();
