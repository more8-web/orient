import { Injectable } from "@angular/core";

import { Observable } from "rxjs";
import { map } from "rxjs/operators";

import { ApiService } from "../api.service";
import { mapContents } from "./contents.api.map";
import { ContentList } from "@context/models";

@Injectable({
    providedIn: "root"
})
export class ContentApiService extends ApiService {
    getContents(): Observable<ContentList> {
        return this.get("contents").pipe(map(mapContents));
    }
}
