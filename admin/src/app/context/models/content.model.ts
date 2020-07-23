export type ContentList = {
    [id: number]: Content
};

export interface Content {
    id: number;
    alias: string;
    description: string;
    value: string;
}
