export type PageList = {
    [id: number]: Page
};

export interface Page {
    id: number;
    alias: string;
    url: string;
    template: string;
}
