import { Injectable } from "@angular/core";

import { Observable } from "rxjs";
import { map } from "rxjs/operators";

import { ApiService } from "../api.service";
import { mapPages } from "./pages.api.map";
import { PageList } from "@context/models";

@Injectable({
    providedIn: "root"
})
export class PageApiService extends ApiService {
    getPages(): Observable<PageList> {
        return this.get("pages").pipe(map(mapPages));
    }
}
