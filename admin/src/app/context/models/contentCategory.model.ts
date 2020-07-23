export type ContentCategoryList = {
    [id: number]: ContentCategory
};

export interface ContentCategory {
    id: number;
    parent: number;
    alias: string;
}
