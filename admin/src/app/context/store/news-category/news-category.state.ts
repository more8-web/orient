import { NewsCategoryList } from "../../models";

export const newsFeatureKey = "news-category";

export interface State {
    entities: NewsCategoryList;
    ids: number[];
    selected: number;
    isLoading: boolean;
}

export const initialState: State = {
    entities: {},
    ids: [],
    selected: null,
    isLoading: false,
}
