import { GetKeywordsResponse } from "./dto";
import { Keyword, KeywordList } from "@context/models";

export function mapKeywords(data: GetKeywordsResponse[]): KeywordList {
    return data.reduce(
        (acc, item) => {
            const keyword: Keyword = {
                id: item.keyword_id,
            value: item.keyword_value,
            };
            acc[keyword.id] = keyword;
            return acc;
        }, {}
    );
}

