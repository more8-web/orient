import { Store } from "@ngrx/store";
import { Injectable } from "@angular/core";

import * as actions from "./news.actions";
import { News } from "@app/context";

@Injectable()
export class NewsDispatcher {
    constructor(private store: Store) {
    }

    load() {
        return this.store.dispatch(actions.load());
    }

    select(id: number) {
        return this.store.dispatch(actions.select({id}));
    }

    update(news: News) {
        return this.store.dispatch(actions.update(news));
    }
}

