import { Injectable } from "@angular/core";

import { Observable } from "rxjs";
import { map } from "rxjs/operators";

import { ApiService } from "../api.service";
import { mapKeywords } from "./keywords.api.map";
import { KeywordList } from "@context/models";

@Injectable({
    providedIn: "root"
})
export class KeywordApiService extends ApiService {
    getKeywords(): Observable<KeywordList> {
        return this.get("keywords").pipe(map(mapKeywords));
    }
}
