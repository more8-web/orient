import { Injectable } from "@angular/core";

import { Observable } from "rxjs";
import { map } from "rxjs/operators";

import { ApiService } from "../api.service";
import { mapNewsCategories } from "./news-categories.api.map";
import { NewsCategoryList } from "@context/models";

@Injectable({
    providedIn: "root"
})
export class NewsCategoryApiService extends ApiService {
    getNewsCategories(): Observable<NewsCategoryList> {
        return this.get("news/categories").pipe(map(mapNewsCategories));
    }
}
