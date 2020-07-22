import { NewsList } from "../../models";

export const newsFeatureKey = "news";

export interface State {
    entities: NewsList;
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
