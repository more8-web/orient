import { ContentList } from "../../models";

export const newsFeatureKey = "content";

export interface State {
    entities: ContentList;
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
