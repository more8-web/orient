export type NewsCategoryList = {
    [id: number]: NewsCategory
};

export interface NewsCategory {
    id: number;
    parent: number;
    alias: string;
}
