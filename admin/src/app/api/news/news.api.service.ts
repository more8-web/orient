import { Injectable } from "@angular/core";

import { Observable } from "rxjs";
import { map } from "rxjs/operators";

import { NewsList } from "@app/context";

import { ApiService } from "../api.service";
import { mapNews } from "./news.api.map";

@Injectable({
    providedIn: "root"
})
export class NewsApiService extends ApiService {
    getNews(): Observable<NewsList> {
        return this.get("news").pipe(map(mapNews));
    }
}
