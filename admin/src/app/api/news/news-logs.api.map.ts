import { GetNewsLogsResponse } from "./dto";
import { NewsLog, NewsLogList } from "@context/models";

export function mapNewsLogs(data: GetNewsLogsResponse[]): NewsLogList {
    return data.reduce(
        (acc, item) => {
            const log: NewsLog = {
                    id: item.news_log_id,
                    newsId: item.news_id,
                    userId: item.user_id,
                    newsLogEvent: item.news_log_event,
                    newsLogComment: item.news_log_comment,
                    newsLogCreatedAt: item.news_log_created_at,
                }
            ;
            acc[log.id] = log;
            return acc;
        }, {}
    );
}

