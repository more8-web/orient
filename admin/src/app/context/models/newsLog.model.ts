export type NewsLogList = {
    [id: number]: NewsLog
};

export interface NewsLog {
    id: number;
    newsId: number;
    userId: number;
    newsLogEvent: string;
    newsLogComment: string;
    newsLogCreatedAt: string;
}
