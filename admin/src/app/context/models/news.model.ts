export type NewsList = {
    [id: number]: News
};

export interface News {
    id: number;
    alias: string;
    status: string;
}
