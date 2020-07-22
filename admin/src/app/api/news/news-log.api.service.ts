import { Injectable } from "@angular/core";

import { Observable } from "rxjs";
import { map } from "rxjs/operators";

import { ApiService } from "../api.service";
import { mapNewsLogs } from "./news-logs.api.map";
import { NewsLogList } from "@context/models";

@Injectable({
    providedIn: "root"
})
export class NewsLogApiService extends ApiService {
    getNewsLogs(): Observable<NewsLogList> {
        return this.get("news/logs").pipe(map(mapNewsLogs));
    }
}
