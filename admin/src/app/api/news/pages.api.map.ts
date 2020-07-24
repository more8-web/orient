import { GetPagesResponse } from "./dto";
import { Page, PageList } from "@context/models";

export function mapPages(data: GetPagesResponse[]): PageList {
    return data.reduce(
        (acc, item) => {
            const page: Page = {
                id: item.page_id,
            alias: item.page_alias,
            url: item.page_url,
            template: item.page_template,
            };
            acc[page.id] = page;
            return acc;
        }, {}
    );
}

