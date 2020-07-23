import { createAction, props } from "@ngrx/store";
import { NewsLogList, NewsLog } from "../../models";


export const load = createAction("[News Log] Load News Log");
export const loadSuccess = createAction("[News Log] Load News Log Success", (logs: NewsLogList) => ({logs}));
export const loadFailure = createAction("[News Log] Load News Log Failure", props<{ error: any }>());
export const select = createAction("[News Log] Select News Log", props<{ id: number }>());
export const update = createAction("[News Log] Update News Log", (logs: NewsLog) => ({logs}));

