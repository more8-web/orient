import { Injectable } from "@angular/core";

import { Observable } from "rxjs";
import { map } from "rxjs/operators";

import { ApiService } from "../api.service";
import { mapContentCategories } from "./content-categories.api.map";
import { ContentCategoryList } from "@context/models";

@Injectable({
    providedIn: "root"
})
export class ContentCategoryApiService extends ApiService {
    getContentCategories(): Observable<ContentCategoryList> {
        return this.get("content/categories").pipe(map(mapContentCategories));
    }
}
