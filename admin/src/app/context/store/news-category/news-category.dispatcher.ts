import { Store } from "@ngrx/store";
import { Injectable } from "@angular/core";

import * as actions from "./news-category.actions";
import { NewsCategory } from "../../models";

@Injectable()
export class NewsCategoryDispatcher {
    constructor(private store: Store) {
    }

    load() {
        return this.store.dispatch(actions.load());
    }

    select(id: number) {
        return this.store.dispatch(actions.select({id}));
    }

    update(category: NewsCategory) {
        return this.store.dispatch(actions.update(category));
    }
}

