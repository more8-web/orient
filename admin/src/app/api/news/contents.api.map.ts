import { GetContentsResponse } from "./dto";
import { Content, ContentList } from "@context/models";

export function mapContents(data: GetContentsResponse[]): ContentList {
    return data.reduce(
        (acc, item) => {
            const content: Content = {
                id: item.content_id,
            alias: item.content_alias,
            description: item.content_description,
            value: item.content_value,
            };
            acc[content.id] = content;
            return acc;
        }, {}
    );
}

