import { PageList } from "../../models";

export const newsFeatureKey = "pages";

export interface State {
    entities: PageList;
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
