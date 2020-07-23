import { GetContentCategoriesResponse } from "./dto";
import { ContentCategory, ContentCategoryList } from "@context/models";

export function mapContentCategories(data: GetContentCategoriesResponse[]): ContentCategoryList {
    return data.reduce(
        (acc, item) => {
            const category: ContentCategory = {
                id: item.content_category_id,
                parent: item.content_category_parent_id,
                alias: item.content_category_alias
            };
            acc[category.id] = category;
            return acc;
        }, {}
    );
}
