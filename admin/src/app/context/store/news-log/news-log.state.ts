import { NewsLogList } from "../../models";

export const newsFeatureKey = "news-log";

export interface State {
    entities: NewsLogList;
    ids: number[];
    selected: number;
    isLoading: boolean;
}

export const initialState: State = {
    entities: {},
    ids: [],
    selected: null,
    isLoading: false,
};
