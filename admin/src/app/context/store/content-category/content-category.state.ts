import { ContentCategoryList } from "../../models";

export const newsFeatureKey = "content-category";

export interface State {
    entities: ContentCategoryList;
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
