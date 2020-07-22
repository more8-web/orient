import { GetNewsCategoriesResponse } from "./dto";
import { NewsCategory, NewsCategoryList } from "@context/models";

export function mapNewsCategories(data: GetNewsCategoriesResponse[]): NewsCategoryList {
    return data.reduce(
        (acc, item) => {
            const category: NewsCategory = {
                id: item.news_category_id,
                parent: item.news_category_parent_id,
                alias: item.news_category_alias
            };
            acc[category.id] = category;
            return acc;
        }, {}
    );
}
