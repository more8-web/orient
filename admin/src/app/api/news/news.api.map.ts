import { News, NewsList } from "@context/models";

import { GetNewsResponse } from "./dto";

export function mapNews(data: GetNewsResponse[]): NewsList {
    return data.reduce(
        (acc, item) => {
            const news: News = {
                id: item.news_id,
                alias: item.news_alias,
                status: item.news_status,
            };
            acc[news.id] = news;
            return acc;
        }, {}
    );
}
