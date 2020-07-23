import { Store } from "@ngrx/store";
import { Injectable } from "@angular/core";

import * as actions from "./news-log.actions";
import { NewsLog } from "../../models";

@Injectable()
export class NewsLogDispatcher {
    constructor(private store: Store) {
    }

    load() {
        return this.store.dispatch(actions.load());
    }

    select(id: number) {
        return this.store.dispatch(actions.select({id}));
    }

    update(log: NewsLog) {
        return this.store.dispatch(actions.update(log));
    }
}

