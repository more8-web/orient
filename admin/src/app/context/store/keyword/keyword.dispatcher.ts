import { Store } from "@ngrx/store";
import { Injectable } from "@angular/core";

import * as actions from "./keyword.actions";
import { Keyword } from "../../models";

@Injectable()
export class KeywordDispatcher {
    constructor(private store: Store) {
    }

    load() {
        return this.store.dispatch(actions.load());
    }

    select(id: number) {
        return this.store.dispatch(actions.select({id}));
    }

    update(keyword: Keyword) {
        return this.store.dispatch(actions.update(keyword));
    }
}

