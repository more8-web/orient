import { KeywordList } from "../../models";

export const newsFeatureKey = "keyword";

export interface State {
    entities: KeywordList;
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
